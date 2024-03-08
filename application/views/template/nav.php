<nav class="navbar navbar-expand-sm navbar-light bg-primary">
    <div class="container-fluid ">
        <a class="navbar-brand " href="/ci-opentutorial/index.php">Opentutorials</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <?php
                if ($this->session->userdata('is_login')) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="/ci-opentutorial/index.php/auth/logout">로그아웃</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/ci-opentutorial/index.php/auth/login">로그인</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ci-opentutorial/index.php/auth/register">회원가입</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>