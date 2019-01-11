import { NgModule, Injector } from '@angular/core';
import {
  HTTP_INTERCEPTORS,
  HttpClient,
  HttpClientModule
} from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HomeComponent } from './components/home/home.component';
import { Page404Component } from './components/page404/page404.component';

import { LoggerModule, NgxLoggerLevel } from 'ngx-logger';
import { environment } from 'src/environments/environment';
import { UsersComponent } from './components/users/users.component';
import { ApiService } from './services/api/api.service';
import { UserService } from './services/user/user.service';
import { AuthInterceptor } from './interceptors/auth';
import { HeadersInterceptor } from './interceptors/headers';
import { ServerLocationInterceptor } from './interceptors/server';
import { CustomHttpInterceptor } from './interceptors/http';

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
    FormsModule,
    RouterModule.forRoot(routes, { useHash: true }),
    LoggerModule.forRoot({
      serverLoggingUrl: `${environment.api.endpoint}/logs`,
      level: NgxLoggerLevel.ERROR,
      serverLogLevel: NgxLoggerLevel.ERROR
    })
  ],
  providers: [
    ApiService,
    UserService,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: CustomHttpInterceptor,
      multi: true
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}

// {
//   provide: HTTP_INTERCEPTORS,
//   useClass: AuthInterceptor,
//   multi: true,
// },
// {
//   provide: HTTP_INTERCEPTORS,
//   useClass: HeadersInterceptor,
//   multi: true
// },
// {
//   provide: HTTP_INTERCEPTORS,
//   useClass: ServerLocationInterceptor,
//   multi: true
// },
// {
//   provide: HTTP_INTERCEPTORS,
//   useClass: CustomHttpInterceptor,
//   multi: true
// }
