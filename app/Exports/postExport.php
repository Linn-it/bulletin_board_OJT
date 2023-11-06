<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class postExport implements FromCollection, WithHeadings, WithMapping
{

    private $filter;

    public function __construct($filter = null)
    {
        $this->filter = $filter;
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'id',
            'title',
            'description',
            'status',
            'created_user_id',
            'Updated_user_id',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        $query = Post::query();

        if ($this->filter) {
            $query->where(function ($filterquery) {
                $filterquery->where('title', 'like', '%' . $this->filter . '%')
                    ->orWhere('description', 'like', '%' . $this->filter . '%');
            });
        }

        return $query->get();
    }

    public function map($post): array
    {
        $status = ($post->status == 1) ? 'Active' : 'Inactive';
        return [
            $post->id,
            $post->title,
            $post->description,
            $status,
            $post->created_user_id,
            $post->updated_user_id,
            $post->created_at,
            $post->updated_at,
        ];
    }
}
