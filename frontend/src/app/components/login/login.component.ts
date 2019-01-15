import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { JwtService } from '../../services/jwt/jwt.service';
import { AuthService } from '../../services/auth/auth.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  providers: [AuthService, JwtService]
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup;
  loading = false;
  submitted = false;
  returnUrl: string;
  error = '';

  constructor(
    private formBuilder: FormBuilder,
    private service: AuthService,
    private jwt: JwtService,
    private router: Router,
    private route: ActivatedRoute
  ) {}

  ngOnInit() {
    this.loginForm = this.formBuilder.group({
      username: ['', Validators.required],
      password: ['', Validators.required]
    });

    const token = this.jwt.getToken();

    if (token) {
      this.goHome();
    }
  }

  onSubmit() {
    this.submitted = true;

    if (this.loginForm.invalid) {
      return;
    }

    this.loading = true;

    this.login(this.f.username.value, this.f.password.value);
  }

  get f() {
    return this.loginForm.controls;
  }

  public async login(username: string, password: string) {
    const pass = await this.service.login(username, password);

    if (pass) {
      this.goHome();
    }
  }

  public logout() {
    this.service.logout();
    this.goHome();
  }

  public goHome() {
    this.router.navigate(['/home']);
    return true;
  }
}
