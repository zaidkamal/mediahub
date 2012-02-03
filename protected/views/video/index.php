<?php foreach ($videos as $video): ?>
  <?= $this->renderPartial('_video_tile', array('video' => $video)) ?>
<?php endforeach ?>

<script type="text/javascript">
  $(function() {
    var per_page = 10;
    var page     = 1;
    var sort_by  = 'name';
    var sort_dir = 'asc';
    var search_field = 'name';
    var search_term  = '';
  });
</script>