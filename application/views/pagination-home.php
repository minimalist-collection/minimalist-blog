<?php 
	$pages = ceil($pagination['total'] / $pagination['limit']);
	$page = $this->input->get('page') ? $this->input->get('page') : 1;
?>
<?php if($pagination['total'] > $pagination['limit']): ?>
<ul class="pager">
	<li class="page-item <?php if($page == 1) echo 'disabled'?>">
		<a class="page-link" href="<?php if($page != 1) echo '?page=' . strval($page - 1) ?>" aria-label="Previous">Previous
		</a>
	</li>
	<li class="page-item <?php if($page == $pages) echo 'disabled'?>">
		<a class="page-link" href="<?php if($page != $pages) echo '?page=' . strval($page + 1) ?>" aria-label="Next">Next
		</a>
	</li>
</ul>
<?php endif ?>