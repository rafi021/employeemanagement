<?php

    namespace App\Repositories;


    interface PostRepositoryInterface{


        /**
         * Get's a post by it's ID
         *
         * @param int
         */
        public function get($post_id);


        /**
         * Get's all posts
         *
         * null
         */
        public function all();

        /**
         * Delete a post by it's ID
         *
         * @param int
         */
        public function delete($post_id);

        /**
         * Update's a post by it's ID
         *
         * @param int
         */
        public function update($post_id, array $data_array);
    }
?>
