RUN apt-get install curl
RUN curl -sL https://deb.nodesource.com/setup_4.x | bash
RUN apt-get install nodejs