import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { environment } from 'src/environments/environment';
import { LoggerModule, NgxLoggerLevel } from 'ngx-logger';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HomeComponent } from './components/home/home.component';
import { Page404Component } from './components/page404/page404.component';
import { NotificationComponent } from './components/notification/notification.component';
import { UsersComponent } from './components/users/users.component';
import { LoginComponent } from './components/login/login.component';

import { ApiService } from './services/api/api.service';
import { UserService } from './services/user/user.service';
import { NotificationService } from './services/notification/notification.service';

import { AuthInterceptor } from './interceptors/auth';
import { CustomHttpInterceptor } from './interceptors/http';

import { AuthGuard } from './guards/auth.guard';
import { ErrorHandler } from './services/error/ErrorHandler';
import { MaterialModules } from './MaterialModules';

const routes: Routes = [
  { path: '', component: LoginComponent },
  { path: 'home', component: HomeComponent, canActivate: [AuthGuard] },
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
    NotificationComponent,
    HomeComponent,
    UsersComponent,
    LoginComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule,
    RouterModule.forRoot(routes, { useHash: true }),
    LoggerModule.forRoot({
      // serverLoggingUrl: `${environment.api.endpoint}/logs`,
      level: NgxLoggerLevel.ERROR,
      serverLogLevel: NgxLoggerLevel.ERROR
    }),
    // Material Modules
    BrowserModule,
    BrowserAnimationsModule,
    MaterialModules
  ],
  exports: [
    MaterialModules
  ],
  providers: [
    ErrorHandler,
    // Servicios
    ApiService,
    UserService,
    NotificationService,
    // Interceptores
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true },
    {
      provide: HTTP_INTERCEPTORS,
      useClass: CustomHttpInterceptor,
      multi: true
    }
  ],
  bootstrap: [AppComponent],
  schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class AppModule {}
