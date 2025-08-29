<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherWallet extends Model
{
    protected $fillable = [
    'teacher_id',      // Foreign key referencing the teacher
    'school_id',       // Foreign key referencing the school
    'teacher_coins',   // Amount of coins or credits assigned to the teacher
    'ledger_status',   // Status of the ledger entry (e.g., credit, debit, pending)
    'payment_date',    // Date when payment or entry was made
    'shift',           // Shift (e.g., morning, evening) if relevant to the entry
    'status',          // General status field (e.g., active/inactive, processed/pending)
    'source',          // Source of the transaction (e.g., activity, reward, admin)
    ];
}
