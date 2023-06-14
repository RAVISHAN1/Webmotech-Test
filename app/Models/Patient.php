<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $visible = [
        'patient_id',
        'first_appointment_id',
        'invoice',
        'total_receipts',
        'receipts',
        'first_receipt_date',
        'first_invoice_date',
        'first_appointment_date',
        'patient_created_date',
    ];

    protected $appends = [
        'patient_id',
        'first_appointment_id',
        'invoice',
        'total_receipts',
        'receipts',
        'first_receipt_date',
        'first_invoice_date',
        'first_appointment_date',
        'patient_created_date',
    ];

    protected $with = [
        'appointment',
    ];

    // relationships
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'external_patient_id', 'external_patient_id')->orderBy('appointment_date');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'external_patient_id', 'external_patient_id')->orderBy('date');
    }

    public function patientReceipts()
    {
        return $this->hasMany(Receipt::class, 'external_patient_id', 'external_patient_id')->orderBy('receipt_date');
    }

    // attributes
    public function getPatientIdAttribute()
    {
        return $this->external_patient_id;
    }

    public function getFirstAppointmentIdAttribute()
    {
        $first_appointment = $this->appointment->first();
        return $first_appointment ? $first_appointment->appointment_date : null;
    }

    public function getInvoiceAttribute()
    {
        return $this->invoices->pluck('invoice_no');
    }

    public function getTotalReceiptsAttribute()
    {
        return $this->patientReceipts->sum('amount');
    }

    public function getReceiptsAttribute()
    {
        return $this->patientReceipts->pluck('receipt_id');
    }

    public function getFirstReceiptDateAttribute()
    {
        $first_receipt = $this->patientReceipts->first();
        return $first_receipt ? $first_receipt->receipt_date : null;
    }

    public function getFirstInvoiceDateAttribute()
    {
        $first_invoice = $this->invoices->first();
        return $first_invoice ? $first_invoice->date : null;
    }

    public function getFirstAppointmentDateAttribute()
    {
        $first_appointment = $this->appointment->first();
        return $first_appointment ? $first_appointment->appointment_date : null;
    }

    public function getPatientCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}