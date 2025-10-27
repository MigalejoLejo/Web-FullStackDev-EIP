import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { PokemonArtwork } from 'src/app/models/interfaces/pokemon-artwork.interface';
import { PokemonOther } from 'src/app/models/interfaces/pokemon-other.interface';
import { PokemonResponse } from 'src/app/models/interfaces/pokemon-response.interface';

@Component({
  selector: 'app-list-service',
  templateUrl: './list-service.component.html',
  styleUrls: ['./list-service.component.scss']
})
export class ListServiceComponent {

  public pokemonResponse!: PokemonResponse


  constructor( private httpClient: HttpClient ){
  
  }


  ngOnInit(): void {
    this.httpClient.get<PokemonResponse>("https://pokeapi.co/api/v2/pokemon/").subscribe(
      {
        next: (resp:PokemonResponse) => {
          this.pokemonResponse = resp

        },
        error: (error) => {
          console.log(error)
        }
      }
    )
  }
}
