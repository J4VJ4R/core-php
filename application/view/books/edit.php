<div class="container">
    <h2>You are in the View: application/view/books/edit.php (everything in this box comes from that file)</h2>
    <!-- add book form -->
    <div>
        <h3>Edit a book</h3>
        <form action="<?php echo URL; ?>books/updatebook" method="POST">
            <label>Author</label>
            <input autofocus type="text" name="author" value="<?php echo htmlspecialchars($book->author, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Title</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($book->title, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Link</label>
            <input type="text" name="link" value="<?php echo htmlspecialchars($book->link, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_book" value="Update" />
        </form>
    </div>
</div>

