import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';
import { HttpClientModule } from '@angular/common/http'
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { HomeComponent } from './home/home.component';
import { Page404Component } from './page404/page404.component';
import { UsersComponent } from './users/users.component';

import { UserService } from './user-service';

const api = {
  url: 'http://localhost:8080/api/v1'
}

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'users/:id', component: UsersComponent },
  { path: '404', component: Page404Component },
  { path: '**', redirectTo: '404', pathMatch: 'full' }
];

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    Page404Component,
    HomeComponent,
    UsersComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    RouterModule.forRoot(routes, { useHash: true })
  ],
  providers: [
    UserService
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
