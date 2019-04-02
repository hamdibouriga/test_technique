import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';

// HttpClient module for RESTful API
import { HttpClientModule } from '@angular/common/http';

// Routing module for router service
import { AppRoutingModule } from './app-routing.module';

// Forms module
import { FormsModule } from '@angular/forms';

// Components
import { AnnoncesComponent } from './annonces/annonces.component';
import { MondatairesComponent } from './mondataires/mondataires.component';
import { AllResultComponent } from './all-result/all-result.component';

@NgModule({
  declarations: [
    AppComponent,
    AnnoncesComponent,
    MondatairesComponent,
    AllResultComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})

export class AppModule { }