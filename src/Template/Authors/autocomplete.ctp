<?php foreach($authors as $author): ?>
<div class="autocomplete-line"><?= $author['first_name'] .' '. $author['alias'] .' '. $author['last_name'] ?></div>
<?php endforeach; ?>
