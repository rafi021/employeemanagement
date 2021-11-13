<?php


namespace App\Repositories;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{


    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($post_id)
    {
        return Post::findOrFail($post_id);
    }

    /**
     * Get's all post
     *
     * @param int
     * @return collection
     */
    public function all()
    {
        return Post::all();
    }

    /**
     * Delete a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function delete($post_id)
    {
        return Post::findOrFail($post_id)->delete();
    }

    /**
     * Update a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function update($post_id, array $post_data)
    {
        return Post::findOrFail($post_id)->update($post_data);
    }

}

?>
