<?php

namespace Tests\Feature\View\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// 測試 CURD
class PostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 測試可以瀏覽文章列表頁面。
     */
    public function test_it_can_render_index_page(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    /**
     * 測試可以瀏覽文章建立頁面。
     */
    public function test_it_can_render_create_page(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/posts/create');

        $response->assertStatus(200);
    }

    /**
     * 測試可以建立文章。
     */
    public function test_it_can_create_post(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        // 模擬一個有效的文章資料
        $postData = [
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
        ];

        // 發送 POST 請求來創建文章
        $response = $this->post('/posts', $postData);

        // 斷言狀態碼為 302，表示重定向
        $response->assertStatus(302);

        // 斷言文章是否成功儲存到資料庫中
        $this->assertDatabaseHas('posts', $postData);

        // 斷言重定向到文章列表頁面
        $response->assertRedirect(route('posts.index'));

        // 斷言在重定向後的頁面中包含成功消息
        $response->assertSessionHas('success', __('Post created successfully.'));
    }

    /**
     * 測試可以瀏覽文章詳情頁面。
     */
    public function test_it_can_render_show_page(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        // 創建一個測試文章
        $post = Post::factory()->create();

        // 發送 GET 請求訪問文章詳情頁面
        $response = $this->get('/posts/'.$post->id);

        // 斷言頁面返回狀態碼為 200，表示成功
        $response->assertStatus(200);
    }

    /**
     * 測試可以瀏覽文章編輯頁面。
     */
    public function test_it_can_render_edit_page(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        // 創建一個測試文章
        $post = Post::factory()->create();

        // 發送 GET 請求訪問文章編輯頁面
        $response = $this->get('/posts/'.$post->id.'/edit');

        // 斷言頁面返回狀態碼為 200，表示成功
        $response->assertStatus(200);
    }

    /**
     * 測試可以更新文章。
     */
    public function test_it_can_update_post(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        // 創建一個測試文章
        $post = Post::factory()->create();

        // 模擬一個有效的文章資料
        $postData = [
            'title' => 'Updated Post',
            'content' => 'This is an updated post content.',
        ];

        // 發送 PATCH 請求來更新文章
        $response = $this->patch('/posts/'.$post->id, $postData);

        // 斷言狀態碼為 302，表示重定向
        $response->assertStatus(302);

        // 斷言文章是否成功更新到資料庫中
        $this->assertDatabaseHas('posts', $postData);

        // 斷言重定向到文章列表頁面
        $response->assertRedirect(route('posts.index'));

        // 斷言在重定向後的頁面中包含成功消息
        $response->assertSessionHas('success', __('Post updated successfully.'));
    }

    /**
     * 測試可以刪除文章。
     */
    public function test_it_can_delete_post(): void
    {
        // 創建一個已經通過身份驗證的用戶
        $user = User::factory()->create();
        $this->actingAs($user);

        // 創建一個測試文章
        $post = Post::factory()->create();

        // 發送 DELETE 請求來刪除文章
        $response = $this->delete('/posts/'.$post->id);

        // 斷言狀態碼為 302，表示重定向
        $response->assertStatus(302);

        // 斷言文章是否成功從資料庫中刪除
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);

        // 斷言重定向到文章列表頁面
        $response->assertRedirect(route('posts.index'));

        // 斷言在重定向後的頁面中包含成功消息
        $response->assertSessionHas('success', __('Post deleted successfully.'));
    }
}
