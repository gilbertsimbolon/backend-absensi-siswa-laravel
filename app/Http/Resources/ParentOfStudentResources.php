<?php

namespace App\Http\Resources;

use App\Http\Controllers\ParentOfStudentController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentOfStudentResources extends JsonResource
{
    public $status;
    public $message;

    public function __construct($resource, $status = true, $message = 'request berhasil')
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this->resource);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'student_name' => $this->student->name ?? null,
            'message' => 'Registrasi berhasil.'
            // 'status' => $this->status,
            // 'message' => $this->message,
            // 'data' => $this->resource
        ];
    }
}
