<h2> <?php echo $post['title']; ?> </h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
<br>
<div class="post-body">


<?php echo $post['body']; ?>

</div>

<hr>
<a style="margin-right:30px" class="btn btn-default pull-left" href="/posts/edit/<?php echo $post['slug']; ?>" >Edit </a>

<?php echo form_open('/posts/delete/'.$post['Id']); ?>
<input type="submit" value="delete" class="btn btn-danger">
</form>
