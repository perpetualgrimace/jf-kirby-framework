<?

if (isset($class)) { $class = $class; } else { $class = NULL; };
if (isset($id)) { $id = $id; } else { $id = NULL; };

?>


<div class="section<? e($class != NULL, ' ' . $class) ?>"<? e($id != NULL, ' id="' . $id . '"') ?>>
