import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
// import { Observable } from 'rxjs';
// import { map } from 'rxjs/operators';
// import { IUser } from '../interfaces/IUser';
import { JwtService } from '../jwt/jwt.service';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  public token: string;
  private url = `${environment.api.endpoint}/auth/login`;

  constructor(private http: HttpClient, private jwt: JwtService) {
    const currentUser = JSON.parse(localStorage.getItem('currentUser'));
    this.token = currentUser && currentUser.token;

    jwt.saveToken(this.token);
  }

  // login(username: string, password: string): Observable<any> {
  // return this.http.post<any>(this.url, { username: username, password: password })
  //   .pipe(
  //     map(user => {
  //       // login bem-sucedido se houver um token jwt na resposta
  //       if (user && user.token) {
  //         // armazenar detalhes do usuário e token jwt no localStorage para manter o usuário logado entre as atualizações da página
  //         localStorage.setItem('currentUser', JSON.stringify(user));
  //       }

  //       return user;
  //     })
  //   );
  // return Observable<any>;
  // }

  logout(): void {
    // // Limpa o token removendo o usuário do local store para efetuar o logout
    // this.token = null;
    // localStorage.removeItem('currentUser');
  }
}
