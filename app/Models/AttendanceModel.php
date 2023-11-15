<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
    use HasFactory;
    protected $table="attendance";

    public function get_month()
    {
       return $this->belongsTo(MonthModel::class,'month_id');
    }

    public function get_year()
    {
      return  $this->belongsTo(YearModel::class,'year_id');
    }


    public function get_details()
    {
        return  $this->belongsTo(AttendanceDetailsModel::class,'atten_detail_id');
    }

}
