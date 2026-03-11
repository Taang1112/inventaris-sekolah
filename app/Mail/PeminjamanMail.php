<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PeminjamanMail extends Mailable
{
    public $peminjaman;

    public function __construct($peminjaman)
    {
        $this->peminjaman = $peminjaman;
    }

    public function build()
    {
        return $this->subject('Notifikasi Peminjaman Barang')
                    ->view('emails.peminjaman');
    }
}