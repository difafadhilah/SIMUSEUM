<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuTamu extends Model
{
 
    protected $fillable = [
        'tanggal',
        'nama',
        'asal',
        'pekerjaan',
        'usia',
        'kesan',
        'pesan',

    ];

    public static function getAllBukuTamaByCreatedAt()
    {
        $permohonanCounts = BukuTamu::select(DB::raw("DATE_FORMAT(created_at, '%d %M %Y') as created_date"), DB::raw('count(*) as count'))
            ->groupBy('created_date')
            ->get();

        $result = [];

        foreach ($permohonanCounts as $permohonanCount) {
            $data = [
                'created_date' => strval($permohonanCount->created_date),
                'count' => $permohonanCount->count,
            ];

            $result[] = $data;
        }

        return $result;
    }

    public static function getAllBukuTamaGrafik($interval, $value)
    {
        if ($interval === null) {
            $interval = 'today';
        }

        $query = BukuTamu::select(DB::raw("DATE_FORMAT(created_at, '%d %M %Y') as created_date"), DB::raw('count(*) as count'));

        if ($interval === 'year') {
            $query->whereYear('created_at', $value);
        } elseif ($interval === 'month') {
            $query->whereYear('created_at', date('Y', strtotime($value)))->whereMonth('created_at', date('m', strtotime($value)));
        } elseif ($interval === 'week') {
            $startDate = date('Y-m-d', strtotime($value));
            $endDate = date('Y-m-d', strtotime("$startDate +6 days"));
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } elseif ($interval === 'today') {
            $now = now();
            $query->whereDate('created_at', $now->toDateString())->whereTime('created_at', '>=', $now->format('H:i:s'));
        }

        $permohonanCounts = $query->groupBy('created_date')->get();

        $result = [];

        foreach ($permohonanCounts as $permohonanCount) {
            $data = [
                'created_date' => strval($permohonanCount->created_date),
                'count' => $permohonanCount->count,
            ];

            $result[] = $data;
        }

        return $result;
    }
}