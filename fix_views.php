<?php

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('resources/views'));
foreach ($files as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $content = file_get_contents($file->getPathname());
        $newContent = str_replace('{{ $product->image }}', '{{ $product->image_url }}', $content);
        $newContent = str_replace('{{ $deal->image }}', '{{ $deal->image_url }}', $newContent);
        $newContent = str_replace('{{ $testimonial->image_url }}', '{{ $testimonial->asset_url }}', $newContent);
        if ($content !== $newContent) {
            file_put_contents($file->getPathname(), $newContent);
        }
    }
}
echo "Done\n";
