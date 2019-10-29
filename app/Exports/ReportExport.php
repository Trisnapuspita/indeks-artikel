<?php

namespace App\Exports;

use App\Models\ArticleEdition;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportExport implements FromView, WithHeadings, ShouldAutoSize
{
    public function __construct(string $article_title, string $writer, string $desc, string $keyword)
    {
        $this->article_title = $article_title;
        $this->writer = $writer;
        $this->desc = $desc;
        $this->keyword = $keyword;
    }

    public function view(): View
    {
        return view('reports.indeks', [
            'data' => ArticleEdition::where('article_title','like', '%'.$this->article_title.'%')->where('writer', 'like', '%'.$this->writer.'%')->where('desc', 'like', '%'.$this->desc.'%')->where('keyword', 'like', '%'.$this->keyword.'%')->get()
        ]);
    }

    // public function collection()
    // {
    //     return ArticleEdition::select('article_title', 'writer', 'source', 'desc', 'keyword')->get();
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Judul',
    //         'Pengarang',
    //         'Sumber',
    //         'Deskripsi Singkat',
    //         'Kata Kunci',
    //     ];
    // }
}
