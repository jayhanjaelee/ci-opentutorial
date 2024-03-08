<div style="max-width: 500px;" class="container p-5 border border-1 border-primary mt-5">
    <?php echo validation_errors(); ?>
    <form action="/ci-opentutorial/index.php/auth/register" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">이메일</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="이메일" value="<?php echo set_value('email'); ?>">
        </div>
        <div class="mb-3">
            <label for="nickname" class="form-label">닉네임</label>
            <input type="text" class="form-control" name="nickname" id="nickname" placeholder="닉네임" value="<?php echo set_value('nickname'); ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호" value="<?php echo set_value('password'); ?>">
        </div>
        <div class="mb-3">
            <label for="re_password" class="form-label">비밀번호 확인</label>
            <input type="password" class="form-control" name="re_password" id="re_password" placeholder="비밀번호 확인" value="<?php echo set_value('re_password'); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>