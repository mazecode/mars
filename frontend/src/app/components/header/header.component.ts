import { Component, OnInit } from '@angular/core';
import { SessionService } from '../../services/session/session.service';
import { IUser } from '../../interfaces/IUser';
import { AuthService } from '../../services/auth/auth.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
  providers: [SessionService]
})
export class HeaderComponent implements OnInit {
  currentUser: IUser;

  constructor(private session: SessionService, private auth: AuthService) {
    this.currentUser = this.auth.getCurrentUser();
  }

  ngOnInit() {}

  public logout() {
    this.auth.logout();
  }
}
