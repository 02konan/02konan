<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <?php
            
            foreach ($breadcrumb_links as $index => $link) {
                $url = isset($link['url']) ? $link['url'] : '#';
                $text = isset($link['text']) ? $link['text'] : '';
                $active = ($index == count($breadcrumb_links) - 1) ? 'active' : '';
                if ($url != '#') {
                    echo '<li class="breadcrumb-item"><a href="' . $url . '">' . $text . '</a></li>';
                } else {
                    echo '<li class="breadcrumb-item ' . $active . '">' . $text . '</li>';
                }
            }
            ?>
        </ol>
    </div>
</div>
