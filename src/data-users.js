import { writable } from "svelte/store";

export const currentPage = writable('index');
export const isLogged = writable(false);

export const entrada = writable(
    localStorage.getItem('entrada') ? 
        JSON.parse(localStorage.getItem('entrada')) : 
        []
);