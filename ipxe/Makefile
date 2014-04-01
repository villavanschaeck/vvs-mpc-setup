all: mscboot.kpxe mscboot.lkrn usb-installer.img installer.iso

install: all
	cp mscboot.kpxe ../tftpboot/
	cp mscboot.lkrn ../web/

clean:
	rm -f mscboot.kpxe usb-installer.img installer.iso
	rm -rf ipxe

mscboot.kpxe: ipxe
	make -C ipxe/src bin/undionly.kpxe EMBED=mscboot.ipxe
	cp ipxe/src/bin/undionly.kpxe mscboot.kpxe

mscboot.lkrn: ipxe
	make -C ipxe/src bin/ipxe.lkrn EMBED=mscboot.ipxe
	cp ipxe/src/bin/ipxe.lkrn mscboot.lkrn

usb-installer.img: ipxe
	make -C ipxe/src bin/ipxe.usb EMBED=forceinstall.ipxe
	cp ipxe/src/bin/ipxe.usb usb-installer.img

installer.iso: ipxe
	make -C ipxe/src bin/ipxe.iso EMBED=forceinstall.ipxe
	cp ipxe/src/bin/ipxe.iso installer.iso

ipxe: config-general.h mscboot.ipxe forceinstall.ipxe
	[ -d ipxe ] || git clone git://git.ipxe.org/ipxe.git
	cp config-general.h ipxe/src/config/local/general.h
	cp mscboot.ipxe ipxe/src/mscboot.ipxe
	cp forceinstall.ipxe ipxe/src/forceinstall.ipxe
