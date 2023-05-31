<?php 
namespace App\Helpers;
use Exception;

class Result
{
    public bool $isSuccess;
    public bool $isFailure;
    public ?string $error;
    private $value;

    private function __construct(bool $isSuccess, ?string $error = null, $value = null)
    {
        if ($isSuccess && $error !== null) {
            throw new Exception("InvalidOperation: A result cannot be successful and contain an error");
        }
        if (!$isSuccess && $error === null) {
            throw new Exception("InvalidOperation: A failing result needs to contain an error message");
        }

        $this->isSuccess = $isSuccess;
        $this->isFailure = !$isSuccess;
        $this->error = $error;
        $this->value = $value;
        
        // Freeze the object to make it immutable
        $this->freeze();
    }

    public function getValue()
    {
        if (!$this->isSuccess) {
            throw new Exception("Can't retrieve the value from a failed result.");
        }

        return $this->value;
    }

    public static function ok($value = null): Result
    {
        return new Result(true, null, $value);
    }

    public static function fail(string $error): Result
    {
        return new Result(false, $error);
    }

    public static function combine(array $results): Result
    {
        foreach ($results as $result) {
            if ($result->isFailure) {
                return $result;
            }
        }
        return Result::ok();
    }

    private function freeze()
    {
        if (is_object($this->value)) {
            $props = array_keys(get_object_vars($this->value));
            foreach ($props as $prop) {
                if (is_object($this->value->$prop)) {
                    $this->value->$prop = clone $this->value->$prop;
                }
            }
        }
    }
}
?>