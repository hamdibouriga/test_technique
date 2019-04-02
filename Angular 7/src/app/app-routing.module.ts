import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AnnoncesComponent } from 'src/app/annonces/annonces.component';
import { MondatairesComponent } from 'src/app/mondataires/mondataires.component';
import { AllResultComponent } from 'src/app/all-result/all-result.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'all' },
  { path: 'annonces-list', component: AnnoncesComponent },
  { path: 'annonces-detail/:id', component: AnnoncesComponent },
  { path: 'mondatatires-list', component: MondatairesComponent },
  { path: 'mondatatires-detail/:id', component: AnnoncesComponent },
  { path: 'all', component: AllResultComponent } 
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }