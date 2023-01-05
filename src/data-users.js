import { writable } from "svelte/store";

export const currentPage = writable('index');
export const isLogged = writable(false);