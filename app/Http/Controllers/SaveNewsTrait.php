<?php

namespace App\Http\Controllers;

trait SaveNewsTrait
{
    use SaveCategoryTrait;
    public function getPosts(int $id = null): array
    {
        if ($id != null) {
            $news = [];
            for ($i = 1; $i < 8; $i++) {
                $news[] = [
                    'id' => $i,
                    'title' => fake()->jobTitle(),
                    'description' => fake()->text(100),
                    'author' => fake()->userName(),
                    'created_at' => now()->format('d-m-Y H:i'),
                ];
            }
            return $news;
        }
        return $this->getCategory();
    }
}
