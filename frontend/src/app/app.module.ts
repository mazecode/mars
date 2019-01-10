import { NgModule, Injector } from '@angular/core';
import {
  HTTP_INTERCEPTORS,
  HttpClient,
  HttpClientModule
} from '@angular/common/http';
// import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
// import { RouterModule, Routes } from '@angular/router';

import { AppComponent } from './app.component';
// import { HeaderComponent } from './components/header/header.component';
// import { FooterComponent } from './components/footer/footer.component';
// import { HomeComponent } from './components/home/home.component';
// import { Page404Component } from './components/page404/page404.component';
// import { UsersComponent } from './components/users/users.component';

import { LoggerModule, NgxLoggerLevel } from 'ngx-logger';

// const routes: Routes = [
//   { path: '', component: HomeComponent },
//   { path: 'users/:id', component: UsersComponent },
//   { path: '404', component: Page404Component },
//   { path: '**', redirectTo: '404', pathMatch: 'full' }
// ];

@NgModule({
  declarations: [
    AppComponent,
    // HeaderComponent,
    // FooterComponent,
    // Page404Component,
    // HomeComponent,
    // UsersComponent,
    AuthInterceptorComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(routes, { useHash: true }),
    LoggerModule.forRoot({
      serverLoggingUrl: 'http://localhost:8088/api/logs',
      level: NgxLoggerLevel.ERROR,
      serverLogLevel: NgxLoggerLevel.ERROR
    })
  ],
  providers: [
    BaseService,
    UserService,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: AuthInterceptor,
      multi: true
    },
    JwtService
  ],
  bootstrap: [AppComponent]
})
export class AppModule {}
