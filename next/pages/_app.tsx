import React from "react";
import "../styles/global.css";
import type { AppProps } from "next/app";

function App({ Component: PageComponent, pageProps }: AppProps) {
	return <PageComponent {...{ ...pageProps }} />;
}

export default App;
