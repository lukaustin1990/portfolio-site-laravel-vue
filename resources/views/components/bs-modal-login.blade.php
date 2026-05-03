<div class="modal fade" id="bs-modal-login" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="vue-auth-login">
                <form @submit.prevent="submitLogin">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="login-email" class="form-label">Email address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="login-email" placeholder="Enter email" v-model="email">
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="login-password" placeholder="Enter password" v-model="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="login-remember" v-model="remember">
                            <label class="form-check-label" for="login-remember">Remember me</label>
                        </div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#bs-modal-forgot-password" data-bs-dismiss="modal">Forgot password?</a>
                        <div id="login-error" class="invalid-feedback d-none">
                            Invalid email or password.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col text-start px-0">
                                <button type="button" class="btn btn-success float-start" data-bs-toggle="modal" data-bs-target="#bs-modal-signup">Create Account</button>
                            </div>
                            <div class="col text-end px-0">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>