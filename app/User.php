<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi ke profil Creator
    public function creatorProfile()
    {
        return $this->hasOne(Creator::class);
    }

    // Relasi sebagai Customer
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    // Relasi layanan yang ditinjau Admin
    public function reviewedServices()
    {
        return $this->hasMany(Service::class, 'reviewed_by');
    }

    // Relasi pembayaran yang diverifikasi Admin
    public function verifiedPayments()
    {
        return $this->hasMany(Payment::class, 'verified_by');
    }

    // Relasi permintaan pembatalan
    public function requestedCancellations()
    {
        return $this->hasMany(CancellationRequest::class, 'requested_by');
    }

    public function reviewedCancellations()
    {
        return $this->hasMany(CancellationRequest::class, 'reviewed_by');
    }

    // Relasi pengajuan revisi
    public function orderRevisions()
    {
        return $this->hasMany(OrderRevision::class, 'requested_by');
    }

    // Relasi pengaduan
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function handledComplaints()
    {
        return $this->hasMany(Complaint::class, 'handled_by');
    }
}