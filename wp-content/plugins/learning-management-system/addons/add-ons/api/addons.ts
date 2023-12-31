import { select } from '@wordpress/data';

export const isAddonActive = (
	slug:
		| 'course-announcement'
		| 'gamipress-integration'
		| 'download-materials'
		| 'wc-integration'
		| 'stripe'
		| 'white-label'
		| 'course-faq'
		| 'password-strength'
		| 'course-attachments'
		| 'recaptcha'
		| 'prerequisites'
		| 'multiple-instructors'
		| 'wishlist'
		| 'assignment'
		| 'certificate'
		| 'advanced-quiz'
		| 'manual-enrollment'
		| 'content-drip'
		| 'coupons'
		| 'zoom'
		| 'gradebook'
		| 'social-share'
		| 'course-preview'
) => {
	try {
		let allAddons = [];
		allAddons = select('addOns').getAddons() as any;
		const currentAddon = allAddons.find((addon: Addon) => addon.slug === slug);
		return currentAddon?.active;
	} catch (error) {
		return false;
	}
};
