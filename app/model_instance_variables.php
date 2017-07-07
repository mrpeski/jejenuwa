<?php 
class Model_Variables {
    protected $connection;
    protected $table;
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $perPage = 15;
    public $incrementing = true;
    public $timestamps = true;
    protected $attributes = [];
    protected $original = [];
    protected $relations = [];
    protected $hidden = [];
    protected $visible = [];
    protected $appends = [];
    protected $fillable = [];
    protected $guarded = ['*'];
    protected $dates = [];
    protected $dateFormat;
    protected $casts = [];
    protected $touches = [];
    protected $observables = [];
    protected $with = [];
    public $exists = false;
    public $wasRecentlyCreated = false;
    public static $snakeAttributes = true;
    protected static $resolver;
    protected static $dispatcher;
    protected static $booted = [];
    protected static $globalScopes = [];
    protected static $unguarded = false;
    protected static $mutatorCache = [];
    public static $manyMethods = ['belongsToMany', 'morphToMany', 'morphedByMany'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}