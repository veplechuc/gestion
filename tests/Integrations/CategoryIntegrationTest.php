<?php

use App\Category;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryIntegrationTest extends TestCase
{
    use DatabaseTransactions;


    function test_a_category_is_saved_to_the_database()
    {
        $user = $this->defaultUser();

        $category = factory(Category::class)->create([
            'nombre' => 'categoria1',
            'descripcion' => 'descripcion'
        ]);


       // $user->save($category);

        $this->assertSame(
            'categoria1',
            $category->fresh()->nombre
        );

    }
}
