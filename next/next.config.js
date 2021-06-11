const { PHASE_DEVELOPMENT_SERVER } = require("next/constants");

module.exports = (phase, { defaultConfig }) => {
	const bothConfig = {
		future: {
			webpack5: true,
		},
	};

	if (phase === PHASE_DEVELOPMENT_SERVER) {
		return {
			...bothConfig,
			/* development only config options here */
		};
	}

	return {
		...bothConfig,
		/* config options for all phases except development here */
	};
};
