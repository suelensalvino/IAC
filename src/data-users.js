import { writable } from "svelte/store";

export const currentPage = writable("index");
export const isLogged = writable(false);

export const dashPages = writable("home");

/**
 * @param {string} novaDash
 */
export function dashPage(novaDash) {
  dashPages.set(novaDash);
}
