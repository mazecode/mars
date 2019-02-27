import { Injectable } from '@angular/core';

import { JwtService } from '../jwt/jwt.service';
import { ApiService } from '../api/api.service';
import { IUser } from '../../interfaces/IUser';
import { SessionService } from '../session/session.service';
import { NotificationService } from '../notification/notification.service';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  currentUser: IUser;

  constructor(
    private service: ApiService,
    private jwt: JwtService,
    private session: SessionService,
    private alertService: NotificationService
  ) {}

  public async login(username: string, password: string) {
    let response = null;

    try {
      response = await this.service.Post('/login', { username, password });

      if (response.code === 200 || !response.error) {
        this.session.saveCurrentUser(response.data.user);
        this.jwt.saveToken(response.data.token);

        return true;
      }
    } catch (err) {
      this.alertService.error(err);
    }

    return false;
  }

  public logout(): void {
    this.session.destroyCurrentUser();
    this.jwt.destroyToken();
    window.location.reload();
  }

  public isLogged() {
    const cu = this.session.getCurrentUser();
    const t = this.jwt.getToken();
    if (cu && t) {
      return true;
    }

    return false;
  }

  public getCurrentUser(): IUser {
    return this.session.getCurrentUser();
  }
}
