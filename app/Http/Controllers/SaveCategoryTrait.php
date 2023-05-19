<?php

namespace App\Http\Controllers;

trait SaveCategoryTrait
{
    public function getCategory(): array
    {
        $category = [];
        for ($i = 1; $i < 5; $i++) {
            $category[] = [
                'id' => $i,
                'title' => "Категория: " . fake()->jobTitle(),
                'description' => "Описание: " . fake()->text(100),
                ];

        }
        return $category;
    }
}
