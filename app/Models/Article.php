<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class Article extends Model
{
    //  使用 soft deleting
    use SoftDeletes;
    /**
     * 数据库连接句柄名称
     */
    protected $connection = 'mysql_test';
    /**
     * 注意，我们并没有告诉 Eloquent 将 Flight 模型（model）和哪个数据表进行关联。
     * 默认的规则是：类名的复数形式用来当做数据表的表名，除非明确指定另一个名称。
     * 所以，在这种情况下，Eloquent 将自动推导出 Flight 模型与 flights 数据表关联。
     * 你可以在模型（model）中定义一个 table 属性，用来指定另一个数据表名称
     */
    protected $table = 'articles';
    
    /**
     * Eloquent 假定每一个数据表中都存在一个命名为 id 的列作为主键。你可以通过定义一个 $primaryKey 属性来明确指定一个主键。
     */
    protected $primaryKey = 'id';
    
    /**
     * 默认情况下，Eloquent 期望数据表中存在 created_at 和 updated_at 字段。
     * 如果你不希望由 Eloquent 来管理这两个字段，可以在模型（model）中将 $timestamps 属性设置为 false
     */
    public $timestamps = true;
    
    
    /*
     * 如果你需要定制时间戳的格式，可以通过在模型（model）中设置 $dateFormat 属性来实现。
     * 这个属性决定了日期属性如何在数据库中存储，也决定当模型（model）被序列化为数组 或者 JSON 格式时日期属性的格式：
     */
    protected $dateFormat;
    
    /**
     * 批量赋值 白名单字段  一般白黑名单只需设置一个，如果同时设置，则检验顺序为先白后黑
     */
    protected $fillable = ['title','body','user_id'];
    
    /**
     * 批量赋值 黑名单字段，默认所有字段均不可批量赋值
     */
    protected $guarded = ['*'];
    
    /**
     *  需要转变成日期的字段
     */
    protected $dates = ['deleted_at'];
    

    public function scopeOdd($query){
        return $query->whereIn('id', [1,3,5,7]);
    }
    
    public function scopeRecently($query, $now){
//        return $query->where(DB::raw("ABS(DATEDIFF(created_at, '$now')) <=3"));
//        return $query->whereRaw("ABS(DATEDIFF(created_at, ?)) <=3", [$now]);
        return $query->whereRaw("ABS(DATEDIFF(created_at, ?)) <=3")->addBinding([$now]);
    }
    
    public function scopeOfUser($query, $userId){
        return $query->whereIn('user_id', $userId);
    }
}
