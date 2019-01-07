import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { IUser } from './Interfaces/IUser';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  users: any[] = [
    { id: 1, name: "John Doe", info: ["John Doe", "Laravel", "PHP"] },
    { id: 2, name: "Dummy Foo", info: ["Testing", "TDT"] }
  ];

  constructor(private http: HttpClient) {
    console.debug('User Service init...')
  }

  all(): Observable<IUser[]> {
    return this.http.get<IUser[]>('http://localhost:8080/api/v1/users');
  }

  get(id: number): Observable<IUser> {
    return this.http.get<IUser>(`http://localhost:8080/api/v1/users/${id}`);
  }
}
