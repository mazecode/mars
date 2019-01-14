import { Component, OnInit } from '@angular/core';

import { JwtService } from '../../services/jwt/jwt.service';
import { UserService } from '../../services/user/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  providers: [UserService, JwtService]
})
export class LoginComponent implements OnInit {
  constructor(private service: UserService, private jwt: JwtService) {
    console.log('Login Component init...');
    console.log(jwt);
  }

  ngOnInit() {
    this.service.login().subscribe(response => {
      this.jwt.saveToken(response.data.token);
    });
  }
}
