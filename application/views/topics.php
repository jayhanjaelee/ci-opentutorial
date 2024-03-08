<style>
    .my-container {
        display: flex;
        margin-left: 0;
        margin-right: 0;
        padding-left: 0;
        width: 100%;
    }
</style>

<!-- topic start -->
<div class="container my-container">
    <h1 class="visually-hidden">Topics</h1>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <!-- <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
            </a>
        </li> -->
            <?php
            foreach ($topics as $entry) {
            ?>
                <li class="list-group-item nav-item"><a class="nav-link" href="<?= $this->config->base_url() . 'topic/' . $entry->id ?>"><?= $entry->title ?></a></li>
            <?php
            }
            ?>
        </ul>
        <hr>
    </div>

    <ul class="list-group">

    </ul>