import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
import { Mondataires } from 'src/app/shared/mondataires';

@Injectable({
  providedIn: 'root'
})

export class MondatairesService {
  
  // Define API
  apiURL = 'http://localhost:8000/api';

  constructor(private http: HttpClient) { }

  /*========================================
    CRUD Methods for consuming RESTful API
  =========================================*/

  // Http Options
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }  

  // HttpClient API get() method => Fetch Mondataire list
  getMondataire(): Observable<Mondataires> {
    return this.http.get<Mondataires>(this.apiURL + '/mandataires_tests')
    .pipe(
      retry(1),
      catchError(this.handleError)
    )
  }


  // Error handling 
  handleError(error) {
     let errorMessage = '';
     if(error.error instanceof ErrorEvent) {
       // Get client-side error
       errorMessage = error.error.message;
     } else {
       // Get server-side error
       errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
     }
     window.alert(errorMessage);
     return throwError(errorMessage);
  }

}